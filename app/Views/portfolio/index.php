<?= $this->extend('portfolio/layout') ?>

<?= $this->section('content') ?>

<!-- ================= HERO ================= -->
<section class="hero section" id="home">
    <div class="container hero-grid">
        <div class="hero-copy">
            <?php if (! empty($profile['available'])): ?>
                <span class="badge badge-live"><span class="dot"></span> Available for work</span>
            <?php endif; ?>

            <h1 class="hero-title">
                Hi, I'm <span class="accent"><?= esc($profile['first']) ?></span>.
                <br><?= esc($profile['role']) ?>.
            </h1>

            <p class="hero-sub"><?= esc($profile['tagline']) ?></p>

            <div class="hero-cta">
                <a class="btn btn-primary" href="#projects">View Projects</a>
                <a class="btn btn-ghost" href="#contact">Contact Me</a>
            </div>

            <ul class="hero-socials">
                <?php foreach ($profile['socials'] as $s): ?>
                    <li>
                        <a href="<?= esc($s['url']) ?>" target="_blank" rel="noopener" aria-label="<?= esc($s['label']) ?>">
                            <?= esc($s['label']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="hero-visual">
            <div class="portrait" data-tilt>
                <img src="<?= base_url($profile['photo']) ?>" alt="Litrato ni <?= esc($profile['name']) ?>" width="420" height="420">
                <div class="portrait-glow" aria-hidden="true"></div>
            </div>

            <ul class="hero-stats">
                <?php foreach ($stats as $stat): ?>
                    <li>
                        <strong><?= esc($stat['value']) ?></strong>
                        <span><?= esc($stat['label']) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<!-- ================= ABOUT ================= -->
<section class="section" id="about">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">01 — <?= esc($about['heading']) ?></span>
            <h2 class="section-title">A developer who cares about the details</h2>
        </div>

        <div class="about-grid">
            <div class="about-body reveal">
                <?php foreach ($about['body'] as $p): ?>
                    <p><?= esc($p) ?></p>
                <?php endforeach; ?>

                <dl class="facts">
                    <?php foreach ($about['facts'] as $fact): ?>
                        <div class="fact">
                            <dt><?= esc($fact['k']) ?></dt>
                            <dd><?= esc($fact['v']) ?></dd>
                        </div>
                    <?php endforeach; ?>
                </dl>
            </div>

            <aside class="about-card reveal">
                <h3>Quick Info</h3>
                <ul>
                    <li><span>Email</span><a href="mailto:<?= esc($profile['email']) ?>"><?= esc($profile['email']) ?></a></li>
                    <li><span>Phone</span><a href="tel:<?= esc($profile['phone']) ?>"><?= esc($profile['phone']) ?></a></li>
                    <li><span>Location</span><strong><?= esc($profile['location']) ?></strong></li>
                    <li><span>Status</span><strong class="accent"><?= $profile['available'] ? 'Available' : 'Busy' ?></strong></li>
                </ul>
                <a class="btn btn-primary btn-block" href="<?= esc($profile['resumeUrl']) ?>">Download CV</a>
            </aside>
        </div>
    </div>
</section>

<!-- ================= SKILLS ================= -->
<section class="section section-alt" id="skills">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">02 — <?= esc($skills['heading']) ?></span>
            <h2 class="section-title">Technologies I work with</h2>
        </div>

        <div class="skills-grid">
            <?php foreach ($skills['groups'] as $group): ?>
                <div class="skill-card reveal">
                    <h3><?= esc($group['name']) ?></h3>
                    <ul class="chips">
                        <?php foreach ($group['items'] as $item): ?>
                            <li class="chip"><?= esc($item) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ================= PROJECTS ================= -->
<section class="section" id="projects">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">03 — <?= esc($projects['heading']) ?></span>
            <h2 class="section-title">Some of my work</h2>
        </div>

        <div class="projects-grid">
            <?php foreach ($projects['items'] as $project): ?>
                <article class="project-card reveal<?= ! empty($project['featured']) ? ' is-featured' : '' ?>">
                    <div class="project-media">
                        <img src="<?= base_url($project['image']) ?>" alt="Screenshot sa <?= esc($project['title']) ?>" loading="lazy" width="600" height="360">
                    </div>
                    <div class="project-body">
                        <?php if (! empty($project['featured'])): ?>
                            <span class="tag tag-featured">Featured</span>
                        <?php endif; ?>
                        <h3><?= esc($project['title']) ?></h3>
                        <p><?= esc($project['description']) ?></p>
                        <ul class="chips chips-sm">
                            <?php foreach ($project['tags'] as $tag): ?>
                                <li class="chip"><?= esc($tag) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="project-links">
                            <?php if (! empty($project['url']) && $project['url'] !== '#'): ?>
                                <a href="<?= esc($project['url']) ?>" target="_blank" rel="noopener">Live Demo &rarr;</a>
                            <?php endif; ?>
                            <?php if (! empty($project['repo']) && $project['repo'] !== '#'): ?>
                                <a href="<?= esc($project['repo']) ?>" target="_blank" rel="noopener">Code</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ================= EXPERIENCE ================= -->
<section class="section section-alt" id="experience">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">04 — <?= esc($experience['heading']) ?></span>
            <h2 class="section-title">My journey</h2>
        </div>

        <ol class="timeline">
            <?php foreach ($experience['items'] as $item): ?>
                <li class="timeline-item reveal">
                    <span class="timeline-period"><?= esc($item['period']) ?></span>
                    <div class="timeline-content">
                        <h3><?= esc($item['title']) ?></h3>
                        <span class="timeline-place"><?= esc($item['place']) ?></span>
                        <p><?= esc($item['description']) ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<!-- ================= CONTACT ================= -->
<section class="section" id="contact">
    <div class="container">
        <div class="section-head reveal">
            <span class="eyebrow">05 — <?= esc($contact['heading']) ?></span>
            <h2 class="section-title">Let's talk</h2>
            <p class="section-sub"><?= esc($contact['sub']) ?></p>
        </div>

        <div class="contact-grid">
            <form class="contact-form reveal" id="contactForm" novalidate>
                <div class="field">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name" required>
                    <small class="error" data-error-for="name"></small>
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="you@email.com" required>
                    <small class="error" data-error-for="email"></small>
                </div>
                <div class="field">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="What is this about?" required>
                    <small class="error" data-error-for="subject"></small>
                </div>
                <div class="field">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Write your message..." required></textarea>
                    <small class="error" data-error-for="message"></small>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Send Message</button>
                <p class="form-status" id="formStatus" role="status" aria-live="polite"></p>
            </form>

            <div class="contact-info reveal">
                <ul>
                    <li>
                        <span class="ci-label">Email</span>
                        <a href="mailto:<?= esc($profile['email']) ?>"><?= esc($profile['email']) ?></a>
                    </li>
                    <li>
                        <span class="ci-label">Phone</span>
                        <a href="tel:<?= esc($profile['phone']) ?>"><?= esc($profile['phone']) ?></a>
                    </li>
                    <li>
                        <span class="ci-label">Location</span>
                        <strong><?= esc($profile['location']) ?></strong>
                    </li>
                </ul>
                <ul class="hero-socials">
                    <?php foreach ($profile['socials'] as $s): ?>
                        <li><a href="<?= esc($s['url']) ?>" target="_blank" rel="noopener"><?= esc($s['label']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
