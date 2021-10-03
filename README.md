# QueritelPractical
The repository contains two PHP files.
Convert file is a script that converts a given CSV file to an SQL file.
Api file is a simple API to handle fetching data from the countries table.
The API accepts payload as GET requests only.
There is only two GET parameters which is (`name` & `fields`).
The name parameter takes any country name or `all` to  display names and phone codes.
The fields parameter takes an array of field names for the table columns.
Field names are (`Country Name`, `ISO2`, `ISO3`, `Top Level Domain`, `FIPS`, `ISO Numeric`, `GeoNameID`, `E164`, `Phone Code`, `Continent`, `Capital`, `Time Zone in Capital`, `Currency`, `Language Codes`, `Languages`, `Area KM2`, `Internet Hosts`, `Internet Users`, `Phones (Mobile)`, `Phones (Landline)`, `GDP`).
