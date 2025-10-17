# 3.1 Adding a Custom Message in a Loop
car_brands = ["Toyota", "Ford", "Honda", "BMW", "Tesla"]

for car in car_brands:
    print(car.upper())

for car in car_brands:
    print(f"I would love to drive a {car}.")

# 3.2 Find the vowels – for loop
word = input("Enter a word or phrase: ")
total_vowels = 0

for letter in word:
    if letter.lower() == 'a' or letter.lower() == 'e' or letter.lower() == 'i' or letter.lower() == 'o' or letter.lower() == 'u':
        total_vowels += 1

print(f"Total number of vowels: {total_vowels}")