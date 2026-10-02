/* =====================================================================
   Portfolio — main.js
   Theme, mobile nav, scroll effects, reveal-on-scroll, form validation.
   ===================================================================== */
(function () {
    'use strict';

    const $  = (sel, ctx = document) => ctx.querySelector(sel);
    const $$ = (sel, ctx = document) => Array.from(ctx.querySelectorAll(sel));

    /* ---------- Theme (persisted) ---------- */
    const root = document.documentElement;
    const themeToggle = $('#themeToggle');
    const stored = localStorage.getItem('theme');
    const prefersLight = window.matchMedia('(prefers-color-scheme: light)').matches;

    root.setAttribute('data-theme', stored || (prefersLight ? 'light' : 'dark'));

    themeToggle?.addEventListener('click', () => {
        const next = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
        root.setAttribute('data-theme', next);
        localStorage.setItem('theme', next);
    });

    /* ---------- Mobile nav ---------- */
    const menuToggle = $('#menuToggle');
    const nav = $('#nav');

    const closeNav = () => {
        nav?.classList.remove('open');
        menuToggle?.setAttribute('aria-expanded', 'false');
    };

    menuToggle?.addEventListener('click', () => {
        const open = nav.classList.toggle('open');
        menuToggle.setAttribute('aria-expanded', String(open));
    });

    $$('#nav a').forEach((a) => a.addEventListener('click', closeNav));

    /* ---------- Header on scroll + progress bar + to-top ---------- */
    const header   = $('#header');
    const progress = $('#scrollProgress');
    const toTop    = $('#toTop');

    const onScroll = () => {
        const y = window.scrollY;
        header?.classList.toggle('scrolled', y > 10);
        toTop?.classList.toggle('show', y > 500);

        const docH = document.documentElement.scrollHeight - window.innerHeight;
        if (progress) progress.style.width = (docH > 0 ? (y / docH) * 100 : 0) + '%';
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    toTop?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

    /* ---------- Reveal on scroll ---------- */
    const revealEls = $$('.reveal');
    if ('IntersectionObserver' in window) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        revealEls.forEach((el) => io.observe(el));
    } else {
        revealEls.forEach((el) => el.classList.add('visible'));
    }

    /* ---------- Active nav link ---------- */
    const sections = $$('main section[id]');
    const navLinks = $$('#nav a');
    if (sections.length && 'IntersectionObserver' in window) {
        const spy = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    navLinks.forEach((l) =>
                        l.classList.toggle('active', l.getAttribute('href') === '#' + entry.target.id)
                    );
                }
            });
        }, { threshold: 0.5, rootMargin: '-20% 0px -35% 0px' });
        sections.forEach((s) => spy.observe(s));
    }

    /* ---------- Portrait tilt ---------- */
    const tilt = $('[data-tilt]');
    if (tilt && window.matchMedia('(pointer: fine)').matches) {
        const MAX = 8;
        tilt.addEventListener('mousemove', (e) => {
            const r = tilt.getBoundingClientRect();
            const px = (e.clientX - r.left) / r.width - 0.5;
            const py = (e.clientY - r.top) / r.height - 0.5;
            tilt.style.transform = `perspective(900px) rotateY(${px * MAX}deg) rotateX(${-py * MAX}deg)`;
        });
        tilt.addEventListener('mouseleave', () => { tilt.style.transform = ''; });
    }

    /* ---------- Contact form validation ---------- */
    const form = $('#contactForm');
    const status = $('#formStatus');

    const setError = (name, message) => {
        const field = form?.querySelector(`[name="${name}"]`)?.closest('.field');
        field?.classList.toggle('invalid', Boolean(message));
        const err = form?.querySelector(`[data-error-for="${name}"]`);
        if (err) err.textContent = message || '';
    };

    const validators = {
        name:    (v) => (v.trim().length >= 2 ? '' : 'Please enter your name.'),
        email:   (v) => (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()) ? '' : 'Please enter a valid email.'),
        subject: (v) => (v.trim().length >= 3 ? '' : 'Please enter a subject.'),
        message: (v) => (v.trim().length >= 10 ? '' : 'Please write a message (10+ characters).'),
    };

    form?.addEventListener('submit', async (e) => {
        e.preventDefault();
        let ok = true;

        Object.keys(validators).forEach((name) => {
            const input = form.elements[name];
            const error = validators[name](input.value);
            setError(name, error);
            if (error) ok = false;
        });

        if (!ok) {
            if (status) { status.textContent = 'Please fix the fields above.'; status.classList.remove('ok'); }
            return;
        }

        const submitBtn = form.querySelector('button[type="submit"]');
        const original = submitBtn?.textContent;
        if (submitBtn) { submitBtn.disabled = true; submitBtn.textContent = 'Sending...'; }
        if (status) { status.textContent = ''; status.classList.remove('ok'); }

        try {
            const res = await fetch(form.action || '/contact', {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                body: new FormData(form),
            });
            const json = await res.json();

            if (res.ok && json.ok) {
                if (status) { status.textContent = json.message || 'Thank you! Your message has been received.'; status.classList.add('ok'); }
                form.reset();
            } else if (json.errors) {
                Object.keys(json.errors).forEach((name) => setError(name, json.errors[name]));
                if (status) status.textContent = 'Please fix the fields above.';
            } else {
                if (status) status.textContent = 'Something went wrong. Please try again.';
            }
        } catch (err) {
            if (status) status.textContent = 'Could not reach the server. Please try again.';
        } finally {
            if (submitBtn) { submitBtn.disabled = false; submitBtn.textContent = original; }
        }
    });

    form?.addEventListener('input', (e) => {
        const name = e.target.name;
        if (name && validators[name]) setError(name, '');
    });
})();
