#MageSDK

A PHP wrapper for the Magento 2 APIs offering ease of use for retrieving and setting data.

PLEASE NOTE: for now this project is alpha stability, breaking changes might be made in the near future.
For now the main focus is on retrieving info

## Installation
Install module via composer. Then configure a .env file in the modules root directory within vendor.
Use the `vendor/bin/magesdk token:admin` tool to create the required API tokens

## Which APIs are integrated
- Store config: API + Model, should maybe add an object class instead of array
- Directory country & currency: API + Objects
- Product: work in progress on Model, API, Object
- Integration Token: created API classes, no other objects required, are used by CLI tool

## Architecture
Sounds a lot more fancy than it is but the basic idea is you have API classes, Object classes and Models.
- Models are what you want to use in your projects. The idea is to keep them stable between versions.
- Object classes offer an easy way to explore what data is (or should be) in a certain entity.
- API classes do the actual communication with the API via the Api\Client library

There are 4 basic goals to this SDK library
- Make using the Magento 2 API easy
- Offer any 'missing' business logic you might need when using the APIs
- Keep the library as simple as possible
- Isolate your project from any breaking changes

## Versioning
Use the tagged versions in the repo. They should reflect the compatible Magento 2 version plus some internal versioning

## Testing

### Integration testing
All integration tests were written on a Magento 2 instance with unmodified sample data.

## Contributing

I would love to have some help on this project. With PRs, bug reporting or just give your opinion on how this
could be improved via a feature issue.