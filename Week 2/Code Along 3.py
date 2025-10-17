import random
"""
pseduo code:
Generate 2 random numbers
ask the user what the sum of the generated numbers are 
add the sum of the numbers
begin loop
while answer does not equal the sum
check if the user input matches the sum
if correct, then print "correct" at the end of the loop
else, print "incorrect" and prompt the user again.

"""

num1 = random.randint(0,50)
num2 = random.randint(0,50)

answer = int(input("What is the sum of " + str(num1) + " + " + str(num2) + "\n"))
num_sum = num1 + num2

if (answer == num_sum):
    print("Correct!")

while num_sum != answer:
    print("Incorrect, Please Try Again")
    answer = int(input("What is the sum of " + str(num1) + " + " + str(num2) + "\n"))


    if (answer == num_sum):
        print("Correct!")
        break
