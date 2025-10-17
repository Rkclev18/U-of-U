# Week 6
# Code Along Lab 1
# Format() Function

print("The {} {} {}".format("Fox", "Brown", "Quick"))

print("The {0} {2} {1} {0}".format("Fox", "Brown", "Quick"))

print("The {q} {b} {f}".format(f = "Fox", b = "Brown", q = "Quick"))
print("The {f} {f} {f}".format(f = "Fox", b = "Brown", q = "Quick"))

name = "John"
print(f"hello, my name is {name}")

#Float format follows: {value:width.precison f}
result = 100/777
print("The result was {r:1.2}".format(r=result))

"""
\' single quote
\" double quote
\n new line 
\t tab 
\\ back slash
"""

print("http:\\\\google.com")
print(r"http:\\google.com")

print("I'm\nLearning\nPython")
print("\tI'm\tlearning\tPython")
print("Click on the \'Submit\' button")
