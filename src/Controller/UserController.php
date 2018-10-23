<?php
/**
 * Created by PhpStorm.
 * User: kashi
 * Date: 17/10/2018
 * Time: 12:25
 */

namespace App\Controller;
use CMEN\GoogleChartsBundle\GoogleCharts\Options\Histogram\Histogram;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Formation;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\AreaChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ComboChart;



class UserController extends Controller
{
    /**
     * @Route("/mon_deshboards", name="mon_deshboards", methods="GET")
     */
    public function indexAction(){

        $formations = $this->getDoctrine()
            ->getRepository(Formation::class)
            ->findAll();
        $pieChart = new PieChart();
        $pieChart->getData()->setArrayToDataTable(
            [['Task', 'Hours per Day'],
                ['En Formation Seul',     11],
                ['standby',  2],
                ['Piche with caoch', 2],
            ]
        );
        $pieChart->getOptions()->setTitle('Mes Activities');
        $pieChart->getOptions()->setHeight(400);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#00000');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);

        $are = new AreaChart();
        $are->getData()->setArrayToDataTable([['Date', 'Formation1', 'Formation2'],
            ['10/10/2018',  1000,      400],
            ['12/10/2018',  1170,      460],
            ['15/10/2018',  660,       1120],
            ['17/10/2018',  1030,      540]
        ]);

        $are->getOptions()->setTitle('Mes Formation');
        $are->getOptions()->setHeight(400);
        $are->getOptions()->getTitleTextStyle()->setBold(true);
        $are->getOptions()->getTitleTextStyle()->setColor('#00000');
        $are->getOptions()->getTitleTextStyle()->setItalic(true);
        $are->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $are->getOptions()->getTitleTextStyle()->setFontSize(20);
        return $this->render('User/Dashboarduser.html.twig', array('formations' => $formations, 'piechart' => $pieChart, 'AreaChart' => $are ));

        //return $this->redirectToRoute('fos_user_security_login');
    }


    /**
     * @Route("/user_deshboards", name="mon_tablo_bord", methods="GET")
     */
    public function tabloAction(){

        $formations = $this->getDoctrine()
            ->getRepository(Formation::class)
            ->findAll();

        return $this->render('User/index.html.twig', array('formations' => $formations));

        //return $this->redirectToRoute('fos_user_security_login');
    }

    /**
     * @Route("/user_formation/{id}", name="mesformation")
     */
    public function showformation(Request $request){

        if ($request->isXmlHttpRequest()){
            $id = $request->get('id');
            $formation = $this->getDoctrine()->getRepository(Formation::class)->find($id);
            $payload['nom'] =$formation->getNomFormation();
            $payload['Description'] =  $formation->getDescription();
            foreach ($formation->getcontenuImg() as $key => $item){
                $payload['images'][$key] = $item->geturlImage();
            }
            foreach ($formation->getContenutext() as $key => $item){
                $payload['titre'][$key] = $item->getTitre();
                $payload['text'][$key] = $item->getText();
            }
            return new JsonResponse(array('formation' => json_encode($payload)));

        }

    }

}