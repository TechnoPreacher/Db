Компонент строителей запросово SQL

в корне лежит index.php - пример обращения к строителям, подтверждаюищй их работоспособность и возможность матрёшечного вызова с разным вариантом комбинаций методов...

в /src лежат:

level1

класс SqlBuilder, реализующий интерфейс Aigletter\Contracts\Builder\SqlBuilderInterface, имеет ряд свойств, собирает sql-строку 


level2

интерфейс NewQueryInterface, расширяющий Aigletter\Contracts\Builder\BuilderInterface добавлением метода build(): self.
Я не брал igletter\Contracts\Builder\QueryBuilderInterface т.к. там метод build():QueryInterface. Это в интерфейсе ошибка, или я тупой и не смог с ним справиться?

класс QueryBuilder, реализующий интерфейс NewQueryInterface. В его методе build возвращается объект NewQueryInterafce, а в магическом методо __toString() собирается SQL-строка

level3

класс Db с методами one() и all(). Имплементацию интерфейса не делал, по причинам, изложенным выше
протестировать работу без реальной БД не могу: PDO закомментирован, пшев методах могут быть логические ошибки обработки данных...







