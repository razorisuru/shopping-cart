# ShoppingCart for Laravel

**ShoppingCart** is a simple and lightweight package for managing a shopping cart in Laravel applications using sessions. This package is ideal for e-commerce platforms or any project requiring shopping cart functionality.

---

## Features

- Add items to the cart with quantity, price, and custom attributes.
- Update or remove items from the cart.
- Calculate the total cost of items in the cart.
- Clear all items in the cart.
- Session-based for seamless integration.

---

## Installation
1. Clone the repository:
   ```bash
   composer require razorisuru/shopping-cart:dev-main
   ```

2. Configure Composer to use the token (Optional):
   ```bash
   composer config --global github-oauth.github.com your-personal-access-token
   ```

Usage

1. Adding Items to the Cart:
   ```bash
   use razorisuru\ShoppingCart\Cart;

    $cart = app(Cart::class);
    $cart->add(1, 2, 100, ['color' => 'red']); // Add item with ID 1, quantity 2, and price 100
   ```

2. Getting All Cart Items:
   ```bash
   $items = $cart->getAll();
   ```

3. Updating an Item's Quantity:
   ```bash
   $cart->update(1, 5); // Update item with ID 1 to have a quantity of 5
   ```

4. URemoving an Item:
   ```bash
   $cart->remove(1); // Remove item with ID 1
   ```

5. Clearing the Cart:
   ```bash
   $cart->clear();
   ```

6. CCalculating Total Cost:
   ```bash
   $total = $cart->total();
   ```

Requirements
PHP 8.0 or newer
Laravel 8 or newer
illuminate/support

## Contributing
Contributions are welcome! To contribute:
1. Fork the repository.
2. Create a feature branch: `git checkout -b feature-name`.
3. Commit your changes: `git commit -m 'Add some feature'`.
4. Push to the branch: `git push origin feature-name`.
5. Open a pull request.

## License
This project is open-sourced software licensed under the [MIT license](LICENSE).

