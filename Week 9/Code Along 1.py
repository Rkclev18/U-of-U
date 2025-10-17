# Week 9 - OOP Properties

class Numbers:

    MULTIPLIER = 0

    def __init__(self, x, y):
        self.num1 = x #underscore hides the varialbe from outside of the class/object. It's private to this class
        self._num2 = y

    def add(self):
        return self._x + self._y

    def multiply(self, a):
        return self.MULTIPLIER * a

    @property
    def values(self):
        # log each time the values are changed
        return self._x, self._y

    @values.setter
    def values(self, xy_tuple):
        self._x, self._y = xy_tuple

    @values.deleter
    def values(self):
        del self._x
        del self._y




num = Numbers(4,5)

num.MULTIPLIER = 2
val = num.values
print(num.values)
#accessing the setter
num.values = (6,7)
#acessing the getter
print(num.values)