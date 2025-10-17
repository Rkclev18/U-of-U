# Exercise 1: Count Grades

grades = [90, 100, 70, 45, 76, 84, 93, 21, 36, 99, 100]
count_A = count_B = count_C = count_D = count_F = 0

for grade in grades:
    if 90 <= grade <= 100:
        count_A += 1
    elif 80 <= grade < 90:
        count_B += 1
    elif 70 <= grade < 80:
        count_C += 1
    elif 60 <= grade < 70:
        count_D += 1
    else:
        count_F += 1

print(f"A's: {count_A}, B's: {count_B}, C's: {count_C}, D's: {count_D}, F's: {count_F}")

# Exercise 2: Curve Grades
grades = [93, 74, 66, 98, 34, 75, 79, 83, 84, 91, 12, 69, 72]
curved_grades = []

for grade in grades:
    if grade >= 90:
        curved_grades.append(grade)
    elif grade >= 80:
        curved_grades.append(grade + 2)
    elif grade >= 70:
        curved_grades.append(grade + 5)
    else:
        curved_grades.append(grade + 8)

print("Curved Grades:", curved_grades)

# Exercise 3: Weekly Sales
sales = []
days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]

for i in range(7):
    sales.append(int(input(f"Enter sales for {days[i]}: ")))

print("Sales for the week:", sales)

# Exercise 4: List Slicing
my_list = ['a', 'b', 'c', 'd', 'e', 'f', 'g']
print(my_list[:3])
print(my_list[1:4])
print(my_list[-4:])

# Exercise 5: Product Search
products = ["apple", "pear", "peach", "banana"]
search = input("Enter a product name: ").lower()
if search in products:
    print("Product is in our inventory.")
else:
    print("Product not found.")

# Exercise 6: Find Common Elements
a = [1, 2, 3, 4, 5]
b = [2, 3, 10, 11, 12, 1]
common_elements = list(set(a) & set(b))
print(common_elements)

# Exercise 7: Collect Unique Names
names = []
while True:
    name = input("Enter a name (or 'end' to stop): ")
    if name.lower() == "end":
        break
    if name not in names:
        names.append(name)
print("Names entered:", names)

# Exercise 8: Remove Products
products = ["apple", "pear", "peach", "banana"]
while products:
    search = input("Enter a product to remove (or 'end' to stop): ").lower()
    if search == "end":
        break
    if search in products:
        products.remove(search)
        print("Updated products:", products)
    else:
        print("Product not found.")

# Exercise 9: Product Price Lookup
products = ['peanut butter', 'jelly', 'bread']
prices = [3.99, 2.99, 1.99]
product_name = input("Enter a product: ").lower()
if product_name in products:
    index = products.index(product_name)
    print(f"This product costs {prices[index]}")
else:
    print("Product not found.")

# Exercise 10: Student Grades
students = int(input("How many students in the class? "))
assignments = int(input("How many assignments in the class? "))

for student in range(1, students + 1):
    print(f"Student #{student}")
    total_score = 0
    for assignment in range(1, assignments + 1):
        score = int(input(f"Assignment #{assignment}: "))
        total_score += score
    average = total_score / assignments
    print(f"Student #{student} earned a {average}")
