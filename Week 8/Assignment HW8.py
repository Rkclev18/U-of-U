from DBbase import DBbase

class Parts(DBbase):
    def __init__(self, db_name):
        super().__init__(db_name)

    def add(self, name):
        query = "INSERT INTO parts (name) VALUES (?)"
        self.execute_query(query, (name,))

    def update(self, part_id, name):
        query = "UPDATE parts SET name = ? WHERE id = ?"
        self.execute_query(query, (name, part_id))

    def delete(self, part_id):
        query = "SELECT * FROM inventory WHERE part_id = ?"
        inventory = self.fetch_data(query, (part_id,))
        if inventory:
            query = "DELETE FROM inventory WHERE part_id = ?"
            self.execute_query(query, (part_id,))

        query = "DELETE FROM parts WHERE id = ?"
        self.execute_query(query, (part_id,))

    def fetch(self, part_id=None):
        if part_id:
            query = "SELECT * FROM parts WHERE id = ?"
            return self.fetch_data(query, (part_id,))
        else:
            query = "SELECT * FROM parts"
            return self.fetch_data(query)

    def reset_database(self):
        queries = [
            "DROP TABLE IF EXISTS inventory",
            "DROP TABLE IF EXISTS parts",
            """
            CREATE TABLE parts (
                id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
                name TEXT UNIQUE
            )""",
            """
            CREATE TABLE inventory (
                id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
                part_id INTEGER,
                quantity INTEGER,
                current_price TEXT,
                FOREIGN KEY (part_id) REFERENCES parts (id)
            )"""
        ]
        conn = self.get_connection()
        cur = conn.cursor()
        for query in queries:
            cur.execute(query)
        conn.commit()
        conn.close()


class Inventory(DBbase):
    def __init__(self, db_name):
        super().__init__(db_name)

    def add(self, part_id, quantity, current_price):
        query = "INSERT INTO inventory (part_id, quantity, current_price) VALUES (?, ?, ?)"
        self.execute_query(query, (part_id, quantity, current_price))

    def update(self, inventory_id, quantity, current_price):
        query = "UPDATE inventory SET quantity = ?, current_price = ? WHERE id = ?"
        self.execute_query(query, (quantity, current_price, inventory_id))

    def get_all_inventory(self):
        query = "SELECT * FROM inventory"
        return self.fetch_data(query)

    def get_inventory_by_part(self, part_id):
        query = "SELECT * FROM inventory WHERE part_id = ?"
        return self.fetch_data(query, (part_id,))


def test_inventory_system():
    db_name = "inventory.db"
    parts = Parts(db_name)
    inventory = Inventory(db_name)

    parts.reset_database()

    parts.add("Screwdriver")
    parts.add("Hammer")
    parts.add("Wrench")

    print("Parts:")
    for part in parts.fetch():
        print(part)

    inventory.add(1, 100, "10.99")
    inventory.add(2, 50, "12.99")
    inventory.add(3, 200, "8.99")

    inventory.update(1, 150, "11.99")

    print("\nInventory:")
    for inv in inventory.get_all_inventory():
        print(inv)

    print("\nInventory for part 1:")
    for inv in inventory.get_inventory_by_part(1):
        print(inv)

    parts.delete(2)

    print("\nParts after deletion:")
    for part in parts.fetch():
        print(part)

    print("\nInventory after deletion:")
    for inv in inventory.get_all_inventory():
        print(inv)

test_inventory_system()
