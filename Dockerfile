FROM node
WORKDIR /app
COPY app/package.json .
RUN npm install
COPY . .
EXPOSE 8080