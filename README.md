## APP LIST CHECK
## Backend: Laravel , MySql, Api Rest
## Frontend: Vue js 3, Bootstrap, Axios

![Screenshot](img_demo/demo1.png)
![Screenshot](img_demo/MER_ER.png)


## API Reference

#### Post Register Card

```http
  POST api/cards
```

| Body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `title` | `string` | **Required**. Title card |

#### Response

```
```

### UPDATE card
```http
    PUT api/cards/{id}
```

| Body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `number` | **Required**. id card, param route |
| `title` | `string` | **Required**. Title card |

#### Response

```
```

### DELETE card
```http
    DELETE api/cards/{id}
```
| Body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `number` | **Required**. id card, param route |


#### GET all cards
```http
    GET api/cards
```

#### Response

```
```

#### GET card
```http
    GET api/car/{id}
```
| Body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `number` | **Required**. id card, param route |

#### Response

```
```
#### GET card items all
```http
    GET api/cards
```

#### Response

```
```

#### GET items all
```http
    GET api/checks
```

#### Response

```
```
#### POST item register
```http
    POST api/checks
```

#### Response

```
```
#### UPDATE item 
```http
    PUT api/checks/{id}
```
| Body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `number` | **Required**. id item, param route |

#### Response

```
```
#### DELETE item 
```http
    DELETE api/checks/{id}
```
| Body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id` | `number` | **Required**. id item, param route |

#### Response

```
```
