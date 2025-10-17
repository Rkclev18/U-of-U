# Week 7 Code Along 3

class Student:

    first_name = ""
    last_name = ""
    is_graduated = False

    def __int__(self, fname, lname):
        self.first_name = fname
        self.last_name = lname

    def say_hi(self):
        print("Hello", self.first_name, self.last_name)

    def format_name(self):
        return self.first_name + " " + self.last_name

student_b = Student()
student_b.say_hi()
student_a = Student("John", "Degrey")
student_a.say_hi()
print(student_a.format_name())
