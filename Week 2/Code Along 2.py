# # Week 2
# # code along 2
# # Part 1
print(True)
print(False)
print(type(True))
print(1 == 1) # true
print(1 == 2) # false
print(1 != 1) # false
print(1 != 2) # true
print(1 < 2) # true
print(1 > 2) # false
print( 1> 2 and 2 < 5) # false
print( 1 > 2 or 2 < 5) # true
print(not 1 > 2 and not 2 < 5) # false

a = 1
b = 2
c = 5
print(a == b)
print(a > b and b > c and b)

# Part 2

x = -1
if x > 0:
    print("x is positive")
else:
    print("x is less than 0")

x = 50
if x > 0:
    print("x is positive")
elif x == 0:
    print("x is zero!")
else:
    print("x is less than zero")

x = 2
if x > 0:
    print("x is positive")

    if x % 2 == 0:
        print("This is an even number!")
    else:
        print("Number is odd!")
else:
    print("Not a positive number")