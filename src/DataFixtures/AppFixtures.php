<?php

namespace App\DataFixtures;

use App\Entity\Posts;
use App\Entity\Ticket;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $postsContent = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vulputate feugiat lectus quis egestas. In faucibus egestas eros vitae rhoncus. Suspendisse eget porttitor ante, et euismod dolor. Pellentesque imperdiet tristique porta. Nulla mollis orci lacus, id tincidunt ipsum dignissim vitae. Aliquam pretium, augue vel varius consectetur, metus magna egestas dui, quis eleifend nisi urna dapibus arcu. Proin blandit ut felis sed posuere. Praesent tempor lacinia ipsum, quis pharetra velit auctor at. Sed in ex nibh. Morbi iaculis sit amet turpis sit amet varius. Nulla rhoncus est quis rutrum tempus. In et massa ultricies, venenatis magna vel, suscipit ipsum. Nunc interdum orci vel augue congue vehicula. Pellentesque in volutpat nulla, in maximus turpis. Praesent tincidunt nec risus vitae consectetur.

Donec lectus nibh, ullamcorper eu rhoncus id, dictum vel enim. Sed augue dolor, ornare sed pellentesque fringilla, commodo ut urna. Praesent molestie nisl mauris, vel rhoncus neque commodo eu. Vivamus ultricies condimentum nisl a condimentum. Quisque iaculis ex ac ligula hendrerit, vitae sodales tellus gravida. Aliquam ornare nisi vitae erat sagittis scelerisque. Nunc eu sapien consectetur, volutpat orci a, elementum neque. Fusce ut turpis quis purus pharetra gravida. Fusce dapibus purus in lacus porttitor, at condimentum ex aliquam. Cras ut eros tellus. Sed ut nisi congue, rutrum nulla non, tincidunt diam.

Maecenas placerat magna at laoreet commodo. Duis vitae maximus ante. Donec lacus ipsum, blandit at arcu ut, imperdiet venenatis dui. Nulla facilisi. Quisque diam nisi, consequat at mollis sed, aliquet nec libero. Praesent eu ligula turpis. Aliquam erat volutpat. Vestibulum suscipit sem id tristique eleifend. Mauris non volutpat velit. Curabitur ante lectus, vehicula sit amet sem vitae, porta finibus metus. Cras laoreet dolor sit amet odio commodo, vitae aliquet lorem tempor. Ut sit amet eleifend libero.

Vestibulum accumsan quis sapien non luctus. Vestibulum mollis, felis et laoreet lacinia, metus massa varius enim, non sagittis turpis dolor ut mauris. Integer quis quam ante. Fusce placerat lacus sit amet urna mattis scelerisque. Pellentesque ut pulvinar odio. Duis malesuada finibus sapien, id fermentum nunc tempor quis. Nullam aliquam efficitur ex, vel porttitor mauris finibus non. Aliquam dictum, metus in convallis ultrices, ante orci dapibus felis, nec placerat lorem orci ac odio. In rhoncus at ex at mollis.

Maecenas viverra ipsum nulla. Sed vel aliquet velit, ut commodo justo. Fusce sit amet augue ac nulla fringilla tristique vel ut mauris. Nulla facilisi. Quisque egestas congue venenatis. Maecenas sit amet felis pellentesque, scelerisque odio at, rutrum ligula. Nunc egestas ex et augue tincidunt facilisis. In hac habitasse platea dictumst. Integer ut pellentesque leo, sagittis tincidunt mauris. Donec auctor finibus nulla, non porttitor tellus auctor vel. In ultrices dictum dictum. Mauris sed imperdiet ipsum.';

        for($j = 1; $j <= 20; $j++){
            $post = new Posts();
            $post->setName('article n°'.$j);
            $post->setAuthor('student n°'.$j);
            $post->setContent($postsContent);
            $post->setMainPicture('public/posts/main/'.$j.'-file.jpg');
            $manager->persist($post);
        }
        $manager->flush();
    }
}
