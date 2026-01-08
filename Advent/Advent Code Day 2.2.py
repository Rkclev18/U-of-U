"""
--- Part Two ---
The clerk quickly discovers that there are still invalid IDs in the ranges in your list. Maybe the young Elf was doing other silly patterns as well?

Now, an ID is invalid if it is made only of some sequence of digits repeated at least twice. So, 12341234 (1234 two times), 123123123 (123 three times), 1212121212 (12 five times), and 1111111 (1 seven times) are all invalid IDs.

From the same example as before:

11-22 still has two invalid IDs, 11 and 22.
95-115 now has two invalid IDs, 99 and 111.
998-1012 now has two invalid IDs, 999 and 1010.
1188511880-1188511890 still has one invalid ID, 1188511885.
222220-222224 still has one invalid ID, 222222.
1698522-1698528 still contains no invalid IDs.
446443-446449 still has one invalid ID, 446446.
38593856-38593862 still has one invalid ID, 38593859.
565653-565659 now has one invalid ID, 565656.
824824821-824824827 now has one invalid ID, 824824824.
2121212118-2121212124 now has one invalid ID, 2121212121.
Adding up all the invalid IDs in this example produces 4174379265.

What do you get if you add up all of the invalid IDs using these new rules?

Your puzzle answer was 34284458938.
"""


def is_invalid_id(n: int) -> bool:
    s = str(n)
    length = len(s)
    # Try all possible sequence lengths
    for seq_len in range(1, length // 2 + 1):
        if length % seq_len == 0:
            seq = s[:seq_len]
            if seq * (length // seq_len) == s:
                return True
    return False

def parse_ranges(line: str):
    ranges = []
    for part in line.strip().split(','):
        a, b = map(int, part.split('-'))
        ranges.append((a, b))
    return ranges

def find_invalid_ids(ranges):
    invalid_ids = []
    for a, b in ranges:
        for n in range(a, b + 1):
            if is_invalid_id(n):
                invalid_ids.append(n)
    return invalid_ids

with open("Invalid Id's") as f:
    line = f.read()

ranges = parse_ranges(line)
invalid_ids = find_invalid_ids(ranges)
total = sum(invalid_ids)

print("Invalid IDs found:", invalid_ids)
print("Count:", len(invalid_ids))
print("Sum:", total)
