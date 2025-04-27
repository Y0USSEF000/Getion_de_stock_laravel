use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class RehashPasswords extends Command
{
    protected $signature = 'passwords:rehash';
    protected $description = 'Rehash all user passwords with Bcrypt';

    public function handle()
    {
        User::all()->each(function ($user) {
            if (!Hash::needsRehash($user->password)) {
                $user->password = Hash::make($user->password);
                $user->save();
            }
        });
        
        $this->info('All passwords have been rehashed.');
    }
}