<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
</head>
<body>
    <div class="w-screen h-screen flex items-center justify-center bg-slate-300">
        <form method="POST" action="/controller/register.php" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-[30%]">
            <!-- texto -->
            <div class="pb-8 text-center">
                <h1 class="text-xl font-bold text-blue-500">
                    Registrese
                </h1>
            </div>
            <!-- icono -->
            <div class="flex items-center justify-center pb-8">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#3b82f6" class="size-20">
                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                </svg>
            </div>
            <!-- user -->
            <div class="mb-5">
                <label for="user" class="block text-gray-700 text-sm font-bold mb-2">Usuario</label>
                <input type="text" name="user" id="user" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <!-- password -->
            <div class="mb-5">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
                <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                    Registrarse
                </button>
                <a href="/view/login.html" class="text-gray-500 hover:text-blue-500">¿Ya tiene una cuenta?</a>
            </div>
        </form>
    </div>

    <!-- Mostrar alertas de SweetAlert -->
    <?php
    session_start();
    if (isset($_SESSION['success'])) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '" . addslashes($_SESSION['success']) . "'
            });
        </script>";
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['error'])) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '" . addslashes($_SESSION['error']) . "'
            })
        </script>";
        unset($_SESSION['error']);
    }
    ?>
</body>
</html>

