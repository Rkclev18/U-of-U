import pandas as pd
import json

# Load the Excel file
file_path = "saas_query_results.xlsx"  # Update with your file path
df = pd.read_excel(file_path)

# Function to update JSON values
def update_json(json_str, tenant_value, entity_id_value):
    try:
        data = json.loads(json_str)  # Convert JSON string to dictionary
        data["tenant"] = tenant_value  # Update tenant
        data["entityId"] = entity_id_value  # Update entityId
        return json.dumps(data)  # Convert back to JSON string
    except json.JSONDecodeError:
        return json_str  # Return original if JSON parsing fails

# Apply the function
df["Updated_Column"] = df.apply(lambda row: update_json(row["JSON_Column"], row["Tenant_Column"], row["EntityId_Column"]), axis=1)

# Save to a new Excel file
df.to_excel("updated_file.xlsx", index=False)
