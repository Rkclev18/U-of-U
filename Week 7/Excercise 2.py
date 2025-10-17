# 2.1 The Simplest Class
class Simplest:
    pass


print(type(Simplest))

simp = Simplest()
print(type(simp))

# 2.2 Person Class
class Person:
    def __init__(self, first_name, middle_name, last_name):
        self.first_name = first_name
        self.middle_name = middle_name
        self.last_name = last_name

    def format_name(self):
        return f"{self.first_name} {self.middle_name} {self.last_name}"

person = Person("John", "Michael", "Doe")


print(person.format_name())

# 2.3 Cylinder

import math

class Cylinder:
    def set_height_radius(self, height, radius):
        self.height = height
        self.radius = radius

    def volume(self):
        return math.pi * (self.radius ** 2) * self.height

    def surface_area(self):
        top_bottom_area = 2 * math.pi * (self.radius ** 2)
        side_area = 2 * math.pi * self.radius * self.height
        return top_bottom_area + side_area

mycyl = Cylinder()

mycyl.set_height_radius(2, 3)

print(mycyl.volume())
print(mycyl.surface_area())
