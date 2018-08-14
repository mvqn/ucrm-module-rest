# Country (Class)

- [Properties](#properties)
- [Getters](#getters)
- [Setters](#setters)

## Properties

#### `id: int`
`GET`
> Country ID.

#### `name: string`
`GET`
> Country Name.

#### `code: string`
`GET`
> ISO Country Code.


&nbsp;
## Getters

#### `getId(): int`
> Returns the Country ID.

#### `getName(): string`
> Returns the Country Name.

#### `getCode(): string`
> Returns the ISO Country Code.


&nbsp;
## Static Helpers

#### `getStates(): StateCollection`
> Returns of the [StateCollection]() containing all of the States associated with this Country.

#### `getByName(string $name): ?State`
> Returns a single [State]() or **null** if no matching **name** is found.

#### `getByCode(string $code): ?State`
> Returns a single [State]() or **null** if no matching **code** is found.
