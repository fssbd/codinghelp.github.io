package com.admin;

import javax.swing.JOptionPane;
import javax.swing.UIManager;

public class MainClass {
	public static void main(String[] args) {
		try {
			UIManager.setLookAndFeel("com.sun.java.swing.plaf.nimbus.NimbusLookAndFeel");
		}
		catch (Exception e) {
			JOptionPane.showMessageDialog(null, e);
		}
		MainFrame mf=new MainFrame();
	}

}
