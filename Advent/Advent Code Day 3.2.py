"""
--- Part Two ---
The escalator doesn't move. The Elf explains that it probably needs more joltage to overcome the static friction of the system and hits the big red "joltage limit safety override" button. You lose count of the number of times she needs to confirm "yes, I'm sure" and decorate the lobby a bit while you wait.

Now, you need to make the largest joltage by turning on exactly twelve batteries within each bank.

The joltage output for the bank is still the number formed by the digits of the batteries you've turned on; the only difference is that now there will be 12 digits in each bank's joltage output instead of two.

Consider again the example from before:

987654321111111
811111111111119
234234234234278
818181911112111
Now, the joltages are much larger:

In 987654321111111, the largest joltage can be found by turning on everything except some 1s at the end to produce 987654321111.
In the digit sequence 811111111111119, the largest joltage can be found by turning on everything except some 1s, producing 811111111119.
In 234234234234278, the largest joltage can be found by turning on everything except a 2 battery, a 3 battery, and another 2 battery near the start to produce 434234234278.
In 818181911112111, the joltage 888911112111 is produced by turning on everything except some 1s near the front.
The total output joltage is now much larger: 987654321111 + 811111111119 + 434234234278 + 888911112111 = 3121910778619.

What is the new total output joltage?

Your puzzle answer was 170731717900423.
"""

def largest_subsequence(bank: str, k: int) -> int:
    result = []
    start_index = 0

    for remaining_slots in range(k, 0, -1):

        end_index = len(bank) - remaining_slots
        max_digit = '0'
        max_pos = start_index
        for i in range(start_index, end_index + 1):
            if bank[i] > max_digit:
                max_digit = bank[i]
                max_pos = i

        result.append(max_digit)
        start_index = max_pos + 1

    return int("".join(result))


total = 0

with open("Joltage File") as f:
    for line in f:
        bank = line.strip()
        if bank:
            total += largest_subsequence(bank, 12)

print("Part 2 total output joltage:", total)
