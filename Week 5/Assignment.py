# Exercise #1: Generate the pattern
def topOrBottom():
    print("#####")


def middle():
    print("#     #")


def spaces():
    print("  # #  ")


def pattern():
    topOrBottom()
    middle()
    spaces()
    middle()
    topOrBottom()


# Exercise #2: Convert feet to inches and meters
def feet_to_inches(feet):
    inches = feet * 12
    return inches


def feet_to_meters(feet):
    meters = feet * 0.3048
    return meters


def print_conversions():
    for feet in range(10):
        inches = feet_to_inches(feet)
        meters = feet_to_meters(feet)
        print(f"{feet} ft:")
        print(f"... {inches} inches")
        print(f"... {meters} meters")


# Exercise #3: Roll two dice and return in ascending order
import random


def roll_dice(sides):
    die1 = random.randint(1, sides)
    die2 = random.randint(1, sides)
    return sorted([die1, die2])


def roll_dice_sets():
    for sides in range(6, 11):
        dice_roll = roll_dice(sides)
        print(f"{sides} sided dice roll: {dice_roll[0]} & {dice_roll[1]}")


# Exercise #4: Guess the number game
import random


def guess_the_number():
    secret_number = random.randint(1, 20)
    print('I am thinking of a number between 1 and 20.')

    for guesses_taken in range(1, 7):
        guess = int(input('Take a guess: '))

        if guess < secret_number:
            print('Your guess is too low.')
        elif guess > secret_number:
            print('Your guess is too high.')
        else:
            print(f"Good job! You guessed my number in {guesses_taken} guesses!")
            break
    else:
        print(f"Nope. The number I was thinking of was {secret_number}")


# Main function to run all exercises
if __name__ == "__main__":
    # Exercise #1
    print("Exercise #1 - Pattern:")
    pattern()

    # Exercise #2
    print("\nExercise #2 - Feet to Inches and Meters:")
    print_conversions()

    # Exercise #3
    print("\nExercise #3 - Rolling Dice:")
    roll_dice_sets()

    # Exercise #4
    print("\nExercise #4 - Guess the Number:")
    guess_the_number()
