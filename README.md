Easy PHP API
------------

Main purpose of this framework is give you a quick way to build RESTful API and generate
documentation (OpenAPI) for this API. All that you need is to create a configuration to describe
entities and their relationships. Of course, you can make your own custom actions, however 95% of
the logic should be ready right from the box.

The framework gives you the ability to create entities using your favorite ORM. with EasyPHPAPI there is no
need to learn something new. The main goal of the framework is to start without learning documentation.
We want to move native support of your IDE like phpStorm or others to next level. We do not use
strings and arrays where it is possible in purpose of give you perfect navigation by classes and methods.
So, in theory, all your documentation will be in code, and you will access it via `ctrl`+`left click`.

> !!! THIS IS JUST A BEGINNING !!!

Development is still in progress. So please DO NOT use it in production and please DO contribute it.

### Installation

#### installation via docker

1. Go to folder `easyphpapi`
1. Run `docker compose up`
1. That's it

Open in browser http://localhost:8081 to see docs via swagger and test api.

API url is http://localhost:8000

Open api file is in `easyphpapi/docs/last.yaml`

### Structure

Please note. Development is in progress and this is not a framework project for now, it is more app template for future
framework. Therefore, framework files are in `/lib/core` folder and all the other folders located in `/lib` folder will
become independent packages.

`public` - entry point

`docs` - generated documentation (openAPI yaml files)

`container-config` - config files for environment

`app` - main project folder

`app/config` - all configurations for the project

`app/entities` - entities (maybe one will call it Models, but it is more entities)

`app/lib` - all folders in this folder will be separate packages in the future. It will be located in `vendor`
folder. However, for now, we are not ready to separate them. Coming soon

`app/vendor` - Storage for all project dependencies that are installed via composer

### Roadmap (in progress):

- [X] Create docker config for mysql + nginx + php8.2 + swagger
- [X] Create MVP (request handler and parser, response, config and some app class to glue it together)
- [X] Create some entity for tests
- [ ] Improve MVP. Most of the specific tasks are already in the code. There will be even more.
- [ ] openAPI generator
- [ ] env
- [ ] create examples (templates) for popular ORM:
    - [ ] cycleORM (25% is ready)
    - [ ] doctrine
    - [ ] eloquent
    - [ ] take AR from Yii2 if possible
    - [ ] some raw PDO
- [ ] Move every `/app/config/lib/{package}` to separate packages

### Core principles to develop current framework:

1. Use PSR for code styles.
1. Use SOLID principles.
1. Use KISS principles, unless they conflict with others.
1. Make construction which can be parsed by IDE for easy navigation.
    1. Do not use strings if it is possible.
    1. Do not use array if it is possible.
1. Code must be predictable:
    1. Avoid use php MAGIC methods, unless necessary.
    1. Code must be easy to read.
1. The fewer dependencies, the better.
1. Using OOP exclusively for the sake of OOP itself is considered a bad practice. Nonetheless, OOP is great.
1. When critiquing methods and approaches, provide your alternative along with criticism. Through your implementation, 
you might understand the rationale behind the current decision. Otherwise, your contribution will create good methods 
for the project, ultimately improving it.

Everyone is welcome to add proposals, start discussions, or engage in any form. There are two ways to do it: 
start an issue via https://github.com/rucaua/easyphpapi/issues or create a pull request.

