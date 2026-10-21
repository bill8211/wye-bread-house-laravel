<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    protected $signature = 'app:create-admin';

    protected $description = 'Crear la primera cuenta de administrador';

    public function handle(): int
    {
        $name = trim($this->ask('Nombre del administrador'));
        $email = strtolower(trim($this->ask('Correo electrónico')));

        if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('El nombre o el correo electrónico no son válidos.');

            return self::FAILURE;
        }

        if (User::where('email', $email)->exists()) {
            $this->error('Ya existe una cuenta con ese correo electrónico.');

            return self::FAILURE;
        }

        $password = $this->secret('Escribe la contraseña (mínimo 8 caracteres)');

        if (strlen($password) < 8) {
            $this->error('La contraseña debe tener al menos 8 caracteres.');

            return self::FAILURE;
        }

        $confirmation = $this->secret('Confirma la contraseña');

        if ($password !== $confirmation) {
            $this->error('Las contraseñas no coinciden.');

            return self::FAILURE;
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->role = 'admin';
        $user->is_active = true;
        $user->save();

        $this->info('La cuenta de administrador se creó correctamente.');
        $this->line('Correo: ' . $user->email);
        $this->line('Rol: ' . $user->role);

        return self::SUCCESS;
    }
}