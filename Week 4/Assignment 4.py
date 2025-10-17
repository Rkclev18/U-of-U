# Exercise #1: Fantasy Game Inventory
stuff = {'rope': 1, 'torch': 6, 'gold coin': 42, 'dagger': 1, 'arrow': 12, 'map fragments': 3}

def display_inventory(inventory):
    print("Inventory:")
    total_items = 0
    for item, count in inventory.items():
        print(f"{count} {item}")
        total_items += count
    print(f"Total number of items : {total_items}")

display_inventory(stuff)

# Exercise #2: Comma Code
characters = ["Thor", "Thanos", "Black Panther", "Iron Man", "Hulk", "Batman", "Captain America"]
characters_string = ", ".join(characters[:-1]) + " and " + characters[-1]
print(characters_string)

# Exercise #3: Dictionary Lookup
tech_terms = {
    "dict": "stores a key/value pair",
    "list": "stores a value at each index",
    "map": "see dict",
    "set": "stores unordered unique elements",
    "exit": "Exit the program"
}
while True:
    term = input("Enter a technical term (or type 'exit' to stop): ")
    if term.lower() == "exit":
        break
    print(f"{term}: {tech_terms.get(term, 'Term not found')}")

# Exercise #4: Unique Letters in Mississippi
print(set("Mississippi"))

# Exercise #5: Reassign in Nested List
list1 = [1, 2, [3, 4, "hello"]]
list1[2][2] = "goodbye"
print(list1)

# Exercise #6: Grab "hello" from Dictionaries
d1 = {'simple_key': "hello"}
print(d1['simple_key'])

d2 = {"k1": {"k2": "hello"}}
print(d2["k1"]["k2"])
