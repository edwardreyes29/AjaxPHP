# ch 3

## 3.3
---

### json_encode()
converts associative array into json object

```
$assoc = array('a' => 1, 'b' => 2, 'c' => 3);
json_encode($assoc); // '{"a": 1, "b": 2, "c": 3}'
```

### to make an array into a json object

```
$array = array('a', 'b', 'c');
json_encode($array, JSON_FORCE_OBJECT); // '{"0": "a", "1": "b", "2": "c"}'

```

### json_encode on class
```
class User {
  public $first_name = "Joe";
  public $last_name = "Public";
  private $secret_name = "Sloppy Joe";
}

$user = new User();
json_encode($user); // '{"first_name": "Joe"', "last_name": "Public"}'

```

# ch 4

## 4.1
---
