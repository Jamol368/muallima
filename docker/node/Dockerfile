# Node.js Dockerfile
FROM node:19-alpine

# Set working directory
WORKDIR /muallima

# Copy package files and install dependencies
COPY package.json package-lock.json ./

# Install dependencies
RUN npm install

# Copy application files
COPY . .

# Run build script using npx
RUN npm run build

# Optionally, specify the command to start the application if needed
# CMD ["npm", "run", "dev"]
