# Week 8 - Code Along 1

# person class
# student class
# teacher class
# athletic class

class Person:
    _uNID = ""
    _address = ""
    _DOB = ""
    _email = ""
    _first_name = ""
    _last_name = ""

    def __init__(self, first_name, last_name, uNID):
        self._first_name = first_name
        self._first_name = last_name
        self._uNID = uNID

class Student(Person):
    _courses = []

    def add_class(self, class_name):
        self._courses.append(class_name)

    def get_schedule(self):
        return self._courses

class Athlete(Student):
    _sport = ""

    def __init__(self, first_name, last_name, uNID, sport):
        self._sport = sport
        Person.__init__(self, first_name, last_name, uNID)

class Staff(Person):
    _department = ""
    _salary = 0.0

    def __init__(self, first_name, last_name, uNID, salary):
        Person.__init__(self, first_name, last_name, uNID)

        self._salary = salary
    def get_salary(self):
        return self._salary

class Teacher(Staff):
    _courses_taught = []
    def assign_teaching(self, course):
        self._courses_taught.append(course)

    def schedule(self):
        return self._courses_taught


student = Student("John", "DeGrey", "0983841")
student.add_class("Python")
student.add_class("Economics")
print(student.get_schedule())

athlete = Athlete("John", "DeGrey", "0983841", "Football")

staff = Staff("John", "DeGrey", "0983841", 100000)

teacher = Teacher("John", "DeGrey", "0983841", 100000)
teacher.assign_teaching("Python")
teacher.assign_teaching("Power Apps")
print(teacher.schedule())
print(teacher.get_salary())