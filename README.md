eesoft/Yii2 AdminLTE Asset Plus
=====================

forked from https://github.com/dmstr/yii2-adminlte-asset
add active nav item support, to allow custom nav bar item active logic
working for items too

Usage
------------
### To Custom active class display
will set active class to account/\*, password/\* and activity/index

```
$menuItems[] = [
    'url' => ['account/index'],
    'icon' => 'user',
    'label' => 'Account Manage',
    'activeRoute' => ['account', 'password', 'activity/index'],
];
```

### To use default active class logic
will set active class to account/*

```
$menuItems[] = [
    'url' => ['account/index'],
    'icon' => 'user',
    'label' => 'Account Manage',
];
```


### To disable default active class logic
will set active class to account/index only, the default active logic in dmstr/yii2-adminlte-asset

```
$menuItems[] = [
    'url' => ['account/index'],
    'icon' => 'user',
    'label' => 'Account Manage',
    'disableActiveRoute' => true,
];
```
