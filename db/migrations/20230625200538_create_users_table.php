<?php
declare(strict_types=1);

use App\Http\Models\User;
use Phinx\Util\Literal;
use Phinx\Migration\AbstractMigration;

final class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table(User::TABLE);

        $table->addColumn('name', 'string')
            ->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addTimestamps()
            ->addIndex(['id', 'email'], ['unique' => true])
            ->create();
        if ($this->isMigratingUp()) {
            $rows = [
                [
                    'name' => 'User',
                    'email' => 'user@user.com',
                    'password' => password_hash('password', PASSWORD_BCRYPT)
                ],
                [
                    'name' => 'Admin',
                    'email' => 'admin@admin.com',
                    'password' => password_hash('password', PASSWORD_BCRYPT)
                ],
                [
                    'name' => 'Test',
                    'email' => 'test@test.com',
                    'password' => password_hash('password', PASSWORD_BCRYPT)
                ],
            ];
            $table->insert($rows)->save();
        }
    }

}
