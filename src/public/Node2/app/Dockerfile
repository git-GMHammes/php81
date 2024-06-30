# Especifique a imagem base
FROM node:16

# Defina o diretório de trabalho no container
WORKDIR /usr/src/app

# Copie o package.json e o package-lock.json
COPY package*.json ./

# Instale as dependências
RUN npm install

# Copie o resto dos arquivos da aplicação
COPY . .

# Exponha a porta que a aplicação usa
EXPOSE 3000

# Comando para iniciar a aplicação
CMD ["npm", "start"]
