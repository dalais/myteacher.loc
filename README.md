ЗАДАЧА

написать систему учёта учеников и учителей.

Подготовить небольшой демонстрационный проект.
Его цель - показать, что php и mysql способны хранить десятки
и сотни тысяч пользователей, и даже предоставлять нужные
отчёты очень и очень быстро.

Пока для учителя и ученика достаточно
хранить только имя, и, может быть, id.

И реализовать следующие страницы:

1. Создание нового учителя или ученика

2. Назначение учителю какого-либо ученика.
    У учителя/ученика может быть любое количество учеников/учителей

3. Список всех учителей с количеством занимающихся у них учеников

4. Список учителей, с которыми занимаются только следующие
    ученики: Георгий, Харитон, Денис, Андрей

5. Информация о любых двух учителях, у которых максимальное количество общих учеников

Более точные требования:

- можно использовать любой фреймворк, но не обязательно
- итоговое приложение должно уметь запускаться на встроенном php сервере
- проект должен работать на php 5.4+, mysql 5.6+