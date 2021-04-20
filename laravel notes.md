## Accessor
- accessor provide a wrapper on the top of column where we can modify our value and return
- `get{CapitalizedName}Attribute` will create accessor. Ex. `getFirstNameAttribute` will create `first_name` attribute
- accessors are getter
```php
public function getNameAttribute(string $name)
{
    return "Mr. " . $name;
}
```
Now if we call `$obj->name` (if the origina name is foo) will returen `Mr. foo`
# Mutator
- setter
- it will not be possible to create associated models using mutator if the associated model need the id of the model