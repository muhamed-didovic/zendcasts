<?php
/**
 * Boost Software License 1.0 (BSL1.0)
 * 
 * Permission is hereby granted, free of charge, to any person or organization
 * obtaining a copy of the software and accompanying documentation covered by
 * this license (the "Software") to use, reproduce, display, distribute,
 * execute, and transmit the Software, and to prepare derivative works of the
 * Software, and to permit third-parties to whom the Software is furnished to
 * do so, all subject to the following:
 *
 * The copyright notices in the Software and this entire statement, including
 * the above license grant, this restriction and the following disclaimer, must
 * be included in all copies of the Software, in whole or in part, and all
 * derivative works of the Software, unless such copies or derivative works are
 * solely in the form of machine-executable object code generated by a source
 * language processor.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE, TITLE AND NON-INFRINGEMENT. IN NO EVENT
 * SHALL THE COPYRIGHT HOLDERS OR ANYONE DISTRIBUTING THE SOFTWARE BE LIABLE
 * FOR ANY DAMAGES OR OTHER LIABILITY, WHETHER IN CONTRACT, TORT OR OTHERWISE,
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 */
namespace ZC\Entity;
/**
 * Description of UserTest
 *
 * @author jon
 */
class UserTest
    extends \ModelTestCase
{
    public function testCanCreateUser()
    {
        $this->assertInstanceOf('ZC\Entity\User',new User());
    }

    public function testCanSaveFirstAndLastNameAndRetrieveThem()
    {

        $em = $this->doctrineContainer->getEntityManager();
        $em->persist($this->getTestUser());
        $em->flush();

        $users = $em->createQuery('select u from ZC\Entity\User u')->execute();
        $this->assertEquals(1,count($users));

        $this->assertEquals('John',$users[0]->firstname);
        $this->assertEquals('Smith',$users[0]->lastname);
    }

    public function testCanAddPurchasesToUser()
    {
        $u = $this->getTestUser();
        
        $purchase1 = new Purchase();
        $purchase1->amount = 12.99;
        $purchase1->storeName = "3A";

        $purchase2 = new Purchase();
        $purchase2->amount = 2.99;
        $purchase2->storeName = "3B";
        


        $u->purchases = array($purchase1, $purchase2);
        $em = $this->doctrineContainer->getEntityManager();
        $em->persist($u);
        $em->flush();

        $users = $em->createQuery('select u from ZC\Entity\User u')->execute();
        $this->assertEquals(1,count($users));
        $this->assertEquals(2,count($users[0]->purchases));

        $this->assertEquals("3B", $users[0]->purchases[1]->storeName);


    }

}

