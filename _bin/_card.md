### S3

Not supposed to store S3 credentials in here because they are part of the project pushed to github.

**Issues with LiveWire & S3**

I tried to get S3 to work along with the screencast (<https://laravel-livewire.com/screencasts/s5-s3-uploads>), but I ran into trouble.  I was able to set `config/filesystems.php` to use the `s3` driver and pull in the AWS credentials in `.env` in order to upload avatars to the S3 bucket I created. However, temporary file uploads were still going to the `storage/app/avatars/livewire-tmp` folder.

Following directions in the screencast I attempted get the temporary files to also go to the S3 bucket, by publishing and setting up the `config/livewire.php` file.  This did not work at all.  It would create the correct temporary URL for the bucket, meaning that it should be using the settings in the `.env` file, but the files were not actually pushed to the bucket (not found when looking via the console).  I tried several iterations (`'disk' => 's3'`, `'disk' => 'avatars'`), but nothing worked. In fact, when I used these, I would also get validation errors on the `newAvatar` field against the `image` rule.
