FROM node:16

RUN apt-get update && apt-get install -y \
    nano \
    zip \
    unzip \
    curl

USER node

EXPOSE 5173

CMD ["sh", "-c", "npm install && npm run dev -- --host"]