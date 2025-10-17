# 1. Exception handling (5 points)
def get_valid_integer():
    while True:
        try:
            user_input = input("Please enter a valid integer: ")
            number = int(user_input)
        except ValueError:
            print("That's not a valid number. Please try again!")
        else:
            print(f"Thank you! You've entered the number: {number}")
            break


get_valid_integer()


# 2. File IO (5 points)
def write_to_file():
    with open('example_file.txt', 'w') as file:
        file.write("This is the first line of text.\n")
        file.write("This is the second line of text.\n")
        file.write("This is the third line of text.\n")
    print("Data written to 'example_file.txt'.")


write_to_file()


# 3. Name (5 points)
def read_file():
    file_name = input("Please enter the file name: ")
    try:
        with open(file_name, 'r') as file:
            for line in file:
                print(line.strip())
    except FileNotFoundError:
        print(f"Error: The file '{file_name}' was not found.")

read_file()
