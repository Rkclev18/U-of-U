# Exercise #1
try:
    with open("most_popular_words_in_english.txt", "r") as file:
        words = file.read().splitlines()
except:
    print("Something went wrong!")
    words = []

user_word = input("Enter a word: ").strip().lower()
if user_word in words:
    print("The word is in the most popular 100 words.")
else:
    print("The word is not in the most popular 100 words.")

# Exercise #2
username = input("Enter a username: ")
password = input("Enter a password: ")

with open("security.txt", "w") as file:
    file.write(username + "\n")
    file.write(password + "\n")

print("Username and password stored successfully.")

# Exercise #3
try:
    with open("security.txt", "r") as file:
        stored_username = file.readline().strip()
        stored_password = file.readline().strip()
except:
    print("Error reading security file!")
    stored_username = ""
    stored_password = ""

input_username = input("Enter username: ")
input_password = input("Enter password: ")

if input_username == stored_username and input_password == stored_password:
    print("Access granted.")
else:
    print("Access denied.")

# Exercise #4
try:
    with open("testscores.txt", "r") as file:
        lines = file.read().splitlines()
except:
    print("Error reading test scores file!")
    lines = []

if lines:
    student_name = lines[0]
    scores = [int(score) for score in lines[1:] if score.isnumeric()]
    if scores:
        avg_score = sum(scores) / len(scores)
        print(f"Student: {student_name}, Average Score: {avg_score:.2f}")
    else:
        print("No valid scores found.")
else:
    print("No data in test scores file.")
