<?php
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;
    use App\Models\BigFive;
    use App\Models\Chronotype;
    use App\Models\Style;
    
    class Member extends Authenticatable
    {
        use HasApiTokens, HasFactory, Notifiable;
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'name',
            'email',
            'password',
        ];
    
        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array<int, string>
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];
    
        /**
         * The attributes that should be cast.
         *
         * @var array<string, string>
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];

        public function BigFive(){
            return $this->hasOne(BigFive::class);
        }

        public function Chronotype(){
            return $this->hasOne(Chronotype::class);
        }
        public function Style(){
            return $this->hasOne(Style::class);
        }
    }

