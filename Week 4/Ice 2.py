# 1.1 Create Dictionaries
birthdays = {
    "Alice": "03/12/1990",
    "Bob": "07/25/1985",
    "Charlie": "11/08/1992",
    "Diana": "04/15/1978"
}
print(birthdays["Alice"])
print(birthdays["Bob"])
print(birthdays["Charlie"])
print(birthdays["Diana"])

# 1.2 Update Dictionaries
birthdays["Diana"] = "06/06/1980"
print(birthdays["Diana"])

# 1.3 Dictionary With Lists
seasons = {
    "Fall": ["September", "October", "November"],
    "Spring": ["March", "April", "May"],
    "Summer": ["June", "July", "August"]
}
print(seasons["Fall"])

# 1.4 Dictionary Merge
winter_season = {"Winter": ["December", "January", "February"]}
seasons.update(winter_season)
print(seasons)
