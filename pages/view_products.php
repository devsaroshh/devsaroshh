<?php
session_start();
include('../includes/db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    $pdo->beginTransaction();

    try {
        $stmt = $pdo->prepare('DELETE FROM inventory WHERE product_id = ?');
        $stmt->execute([$delete_id]);

        $stmt = $pdo->prepare('DELETE FROM sales WHERE product_id = ?');
        $stmt->execute([$delete_id]);

        $stmt = $pdo->prepare('DELETE FROM products WHERE id = ?');
        $stmt->execute([$delete_id]);

        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Failed to delete product: " . $e->getMessage();
        exit();
    }

    header('Location: view_products.php');
    exit();
}

$stmt = $pdo->query('SELECT * FROM products');
$products = $stmt->fetchAll();

if (!$products) {
    echo "No products found.";
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Products</title>
    <link rel="stylesheet" type="text/css" href="../public/css/viewP.css">
</head>

<body>
    <h1>Products</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo htmlspecialchars($product['id']); ?></td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['description']); ?></td>
                <td><?php echo htmlspecialchars($product['price']); ?></td>
                <td><?php echo htmlspecialchars($product['stock']); ?></td>
                <td>
                    <div class="button-group">
                        <a href="edit_product.php?id=<?php echo $product['id']; ?>" style="background-color: #5cb85c; color: white; text-align: center; padding: 5px 10px; border-radius: 4px;">Edit</a>
                        <form method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');" style="display:inline;" id="deleteForm-<?php echo $product['id']; ?>">
                            <input type="hidden" name="delete_id" value="<?php echo $product['id']; ?>">
                            <a href="javascript:void(0);" onclick="document.getElementById('deleteForm-<?php echo $product['id']; ?>').submit();" style="background-color: #5cb85c; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; text-decoration: none;">Delete</a>
                        </form>

                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="dashboard.php">Back to Dashboard</a>
</body>

</html>