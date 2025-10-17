# Sum of Positive Numbers
total_sum = 0

number = int(input("Enter a number (0 to stop): \n"))

while number != 0:
    if number > 0:
        total_sum += number

    number = int(input("Enter a number (0 to stop): \n"))

print(f"The total sum of all positive numbers entered is: {total_sum}")


# Temperature Converter
total_celsius = 0
count = 0

temp_input = input("Enter temperature in Fahrenheit or type 'done' to finish: \n")

while temp_input.lower() != 'done':
    fahrenheit = float(temp_input)
    celsius = (fahrenheit - 32) * 5 / 9

    total_celsius += celsius
    count += 1

    temp_input = input("Enter temperature in Fahrenheit or type 'done' to finish: \n")

if count > 0:
    average_celsius = total_celsius / count
    print(f"The average temperature in Celsius is: {average_celsius:.2f}")
else:
    print("No temperatures were entered.")

