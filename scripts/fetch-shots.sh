#!/bin/bash
# Download live screenshots of each project via thum.io
# Usage: bash scripts/fetch-shots.sh
set -u

OUT="$(cd "$(dirname "$0")/.." && pwd)/public/assets/img/projects"
mkdir -p "$OUT"

urls=(
  "weather-application-five-inky|https://weather-application-five-inky.vercel.app/"
  "middleware-and-messaging|https://middleware-and-messaging-activity.vercel.app/"
  "portfolio-bootstrap|https://portfolio-website-using-bootstrap-5.vercel.app/"
  "aircraft-crusher|https://aircraft-crusher.vercel.app/"
  "chat-application|https://chat-application-seven-blue.vercel.app/"
  "temperature-monitor|https://temperature-monitor-ten.vercel.app/"
  "embracelet|https://embracelet-two.vercel.app/"
  "myportfolio|https://myportfolio-blond-five.vercel.app/"
  "ws101-prelim|https://grace-getungo-ws-101-prelim-project.vercel.app/"
)

for entry in "${urls[@]}"; do
  name="${entry%%|*}"
  url="${entry#*|}"
  dest="$OUT/$name.png"
  if [ -s "$dest" ]; then
    echo "skip  $name (exists)"
    continue
  fi
  echo "fetch $name"
  curl -sL --max-time 90 \
    "https://image.thum.io/get/width/1200/crop/750/noanimate/$url" \
    -o "$dest" || echo "  FAILED $name"
  # Validate it is actually an image
  if ! file "$dest" 2>/dev/null | grep -qiE 'image'; then
    echo "  not an image, removing $name"
    rm -f "$dest"
  fi
done

echo "done -> $OUT"
