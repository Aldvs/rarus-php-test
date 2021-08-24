
print ('Арифметическое выражение – это запись математической формулы с использованием констант,\n '
       'переменных, функций, знаковарифметических операций и круглых скобок. Например: 5 * (4 - 2)')

string = input('Введите арифметическое выражение: ')
string = str(string)

counter = 0
mas = ['(',')']
for elem in string:
    if counter == 0 or counter > 0:
        if elem == mas[0]:
            counter+=1
        elif elem == mas[1]:
            counter-=1
    else:
        print ('Ошибка')
        exit()

if counter == 0:
    print('Всё гуд')
elif counter < 0 or counter > 0:
    print('Ошибка')


