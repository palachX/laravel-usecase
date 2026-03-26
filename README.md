# Laravel UseCase Example

### Зависимости

- docker
- task

### Команды

Перед первым локальным запуском выполнить команду
```shell
task init
```

Посмотреть доступные команды
```shell
task -a
```

### Известные проблемы
* На маке сборка образа php может падать с ошибкой `addgroup: gid '20' in use`
  Для решения проблемы нужно указать другой id группы пользователя через переменную BUILD_ARG_GID, в командной строке или в корневом файле .env
```shell
BUILD_ARG_GID=1000 task init
```
```dotenv
#.env

BUILD_ARG_GID=1000
```

### Полезные ссылки

https://taskfile.dev
