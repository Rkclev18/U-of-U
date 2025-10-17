class Restaurant:
    def __init__(self, name, cuisine_type):
        self.name = name
        self.cuisine_type = cuisine_type

    def describe_restaurant(self):
        print(f"Restaurant Name: {self.name}")
        print(f"Cuisine Type: {self.cuisine_type}")

    def open_restaurant(self):
        print(f"{self.name} is open for business!")

# IceCreamStand inherits from Restaurant
class IceCreamStand(Restaurant):
    def __init__(self, name, cuisine_type, flavors):
        super().__init__(name, cuisine_type)  # Call the parent class's __init__ method
        self.flavors = flavors

    def get_flavors(self):
        print(f"Flavors available at {self.name}: {', '.join(self.flavors)}")

# Create an IceCreamStand instance
ice_cream = IceCreamStand("My Ice Cream Shoppe", "Ice Cream", ["Vanilla", "Chocolate", "Strawberry"])

# Call methods
ice_cream.describe_restaurant()
ice_cream.open_restaurant()
ice_cream.get_flavors()


class User:
    def __init__(self, first_name, last_name, email, username):
        self.first_name = first_name
        self.last_name = last_name
        self.email = email
        self.username = username

    def describe_user(self):
        print(f"Name: {self.first_name} {self.last_name}")
        print(f"Email: {self.email}")
        print(f"Username: {self.username}")

    def greet_user(self):
        print(f"Hello, {self.first_name} {self.last_name}! Welcome back!")

# Admin inherits from User
class Admin(User):
    def __init__(self, first_name, last_name, email, username, privileges):
        super().__init__(first_name, last_name, email, username)  # Call the parent class's __init__ method
        self.privileges = privileges

    def show_privileges(self):
        print(f"Admin {self.first_name} {self.last_name} has the following privileges:")
        for privilege in self.privileges:
            print(f"- {privilege}")

# Create an Admin instance
admin = Admin("Alice", "Smith", "alice.smith@email.com", "admin01", ["can add post", "can delete post", "can ban user"])

# Call methods for the admin
admin.describe_user()
admin.greet_user()
admin.show_privileges()
