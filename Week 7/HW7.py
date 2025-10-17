# Exercise #1
# Variables and Their Scope:
    # Person:
        # Refers to: The class itself.
        # Scope: Global scope (since it's defined outside any function).

    # person:
        # Refers to: An instance of the Person class, created with specific attributes (e.g., name, birthdate).
        # Scope: Local to wherever it is defined or used. In this case, it's used in the global scope for printing and invoking methods.
    # surname:
        # Refers to: An instance variable within the Person class, representing a person's surname.
        # Scope: The __init__ method, and within the instance of the Person class.
    # self:
        # Refers to: The current instance of the class (the object itself).
        # Scope: Only within the methods of the class.
    # age (function name):
        # Refers to: The name of the method that calculates and returns the age of the person.
        # Scope: Defined within the Person class and can be invoked by any instance of that class.
    # age (variable inside the function):
        # Refers to: A local variable that stores the calculated age within the method.
        # Scope: Local to the age() method.
    # self.email:
        # Refers to: An instance variable, the email attribute of the current object.
        # Scope: Accessible from within any method of the Person class.
    # person.email:
        # Refers to: The email attribute of the person object.
        # Scope: It's a way to access the email attribute from outside the Person class using the person instance.


# Exercise 2
import datetime

class Person:
    def __init__(self, name, surname, birthdate, address, telephone, email):
        self.name = name
        self.surname = surname
        self.birthdate = birthdate
        self.address = address
        self.telephone = telephone
        self.email = email
        self._age = None
        self._age_last_recalculated = datetime.date.today()

        self.recalculate_age()

    def recalculate_age(self):
        today = datetime.date.today()
        age = today.year - self.birthdate.year
        if today < datetime.date(today.year, self.birthdate.month, self.birthdate.day):
            age -= 1
        self._age = age
        self._age_last_recalculated = today

    def get_age(self):
        if datetime.date.today() > self._age_last_recalculated:
            self.recalculate_age()
        return self._age

# Test
person = Person(
    "Jane",
    "Doe",
    datetime.date(1992, 3, 12),
    "No. 12 Short Street, Greenville",
    "555 456 0987",
    "jane.doe@example.com"
)

print(person.get_age())


# Exercise 3
class Square:
    def __init__(self, side):
        self.side = side

    def area(self):
        return self.side ** 2


square = Square(4)
print(square.area())

square.side = 5
print(square.area())


# Exercise 4

person = Person("Jane", "Doe", datetime.date(1992, 3, 12), "123 Street", "555 555 5555", "jane@example.com")

print(dir(person))

print(dir(Person))

print(str(person))

print(person.__str__())

print(type(person))
print(type(Person))

def print_custom_attributes(obj):
    for name, value in vars(obj).items():
        print(f'{name}: {value}')

print_custom_attributes(person)

# Exercise 5

class StringReversal:
    def reverse_words(self, sentence):
        words = sentence.split()
        return ' '.join(reversed(words))

reverser = StringReversal()
print(reverser.reverse_words("Hello World Python"))

# Exercise 6

class Circle:
    def __init__(self, radius):
        self.radius = radius

    def area(self):
        return 3.14 * (self.radius ** 2)

    def perimeter(self):
        return 2 * 3.14 * self.radius


circle = Circle(5)
print(circle.area())
print(circle.perimeter())

# Exercise 7

class Rectangle:
    def __init__(self, length, width):
        self.length = length
        self.width = width

    def area(self):
        return self.length * self.width

rectangle = Rectangle(4, 5)
print(rectangle.area())

# Exercise 8

import math


class Line:
    def __init__(self, coor1, coor2):
        self.coor1 = coor1
        self.coor2 = coor2

    def distance(self):
        x1, y1 = self.coor1
        x2, y2 = self.coor2
        return math.sqrt((x2 - x1) ** 2 + (y2 - y1) ** 2)

    def slope(self):
        x1, y1 = self.coor1
        x2, y2 = self.coor2
        return (y2 - y1) / (x2 - x1)


coordinate1 = (3, 2)
coordinate2 = (8, 10)

li = Line(coordinate1, coordinate2)
print(li.distance())
print(li.slope())


# Exercise 9

def collatz(number):
    if number % 2 == 0:
        print(number // 2)
        return number // 2
    else:
        result = 3 * number + 1
        print(result)
        return result

n = int(input("Give me a number: "))

while n != 1:
    n = collatz(n)

