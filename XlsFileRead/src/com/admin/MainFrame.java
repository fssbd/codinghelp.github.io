package com.admin;

import java.awt.BorderLayout;
import java.awt.Toolkit;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JTabbedPane;

public class MainFrame extends JFrame{
	JTabbedPane panelMain=new JTabbedPane();
	JPanel panelTrainData=new JPanel();
	JPanel panelTestData=new JPanel();
	
	TrainData TrainData=new TrainData();
	TestData TestData=new TestData();
	
	
	public MainFrame(){
		init();
		cmp();
	}
	public void cmp(){
		add(panelMain);
		panelMain.add(panelTrainData,"Train Data");
		panelMain.add(panelTestData,"Test Data");
		panelTrainData.setLayout(new BorderLayout());
		panelTrainData.add(TrainData);
		panelTestData.setLayout(new BorderLayout());
		panelTestData.add(TestData);
	}
	public void init(){
		setVisible(true);
		setSize(Toolkit.getDefaultToolkit().getScreenSize());
		setLocationRelativeTo(null);
		setTitle("XLS");
		setDefaultCloseOperation(EXIT_ON_CLOSE);
	}

}
