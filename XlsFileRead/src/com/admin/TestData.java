package com.admin;

import java.awt.BorderLayout;
import java.awt.Dimension;
import java.awt.FlowLayout;
import java.awt.Font;
import java.awt.GridBagConstraints;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.beans.DesignMode;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStream;
import java.text.DecimalFormat;
import java.util.Iterator;
import java.util.Scanner;

import javax.swing.BorderFactory;
import javax.swing.JButton;
import javax.swing.JFileChooser;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTextArea;
import javax.swing.JTextField;

import org.apache.poi.hssf.usermodel.HSSFCell;
import org.apache.poi.hssf.usermodel.HSSFRow;
import org.apache.poi.hssf.usermodel.HSSFSheet;
import org.apache.poi.hssf.usermodel.HSSFWorkbook;

public class TestData extends JPanel {
	JPanel panel_main = new JPanel();
	JPanel panel_north = new JPanel();
	JPanel panel_center = new JPanel();
	JPanel panel_south = new JPanel();
	JPanel panel_north_n = new JPanel();
	JPanel panel_north_c = new JPanel();
	static JTextArea txt_output = new JTextArea(27,115);
	JLabel lbl_source = new JLabel("Source");
	JLabel lbl_destination = new JLabel("Destination");
	static JTextField txt_search = new JTextField(22);
	JButton btn_submit = new JButton("Submit");
	
	JButton btn_upload = new JButton("Browse");
	GridBagConstraints c1 = new GridBagConstraints();
	JScrollPane scroll_out = new JScrollPane(txt_output,JScrollPane.VERTICAL_SCROLLBAR_ALWAYS,JScrollPane.HORIZONTAL_SCROLLBAR_ALWAYS);
	static File file = null;
	JFileChooser chooser = new JFileChooser();

	int lineCount = 0,submit_btn_click=0,len=0,len1=1,len2=1,gr=1,totalSize=0;
	int ll=1;
	String array_index[];
	
	public TestData() {
		cmp();
		btnAction();
	}

	public void input_array() throws Exception 
	{
		int l = 1;
		array_index = new String[lineCount + 1];
		file = new File(txt_search.getText());
		Scanner scan = new Scanner(file);
		txt_output.append("You Input DNA Sequence is: \n");
		while (scan.hasNextLine())
		{
			String s = scan.nextLine();
			txt_output.append(s+"\n");
			array_index[l] = s;
			l++;
		}
	}

	public void count_length() throws Exception 
	{
		file = new File(txt_search.getText());
		Scanner scan = new Scanner(file);
		while (scan.hasNextLine()) 
		{
			String s = scan.nextLine();
			lineCount++;
		}
	}

	public static void readXLSFile() throws IOException
	{
		txt_output.removeAll();
		file=new File(txt_search.getText());
		InputStream ExcelFileToRead = new FileInputStream(file);
		HSSFWorkbook wb = new HSSFWorkbook(ExcelFileToRead);

		HSSFSheet sheet=wb.getSheetAt(0);
		HSSFRow row; 
		HSSFCell cell;
		
		

		Iterator rows = sheet.rowIterator();

		while (rows.hasNext())
		{
			row=(HSSFRow) rows.next();
			Iterator cells = row.cellIterator();
			
			
			while (cells.hasNext())
			{
				cell=(HSSFCell) cells.next();
		
				if (cell.getCellType() == HSSFCell.CELL_TYPE_STRING)
				{
					//System.out.print(cell.getStringCellValue()+" ");
					txt_output.append(cell.getStringCellValue()+",\t");
				}
				else if(cell.getCellType() == HSSFCell.CELL_TYPE_NUMERIC)
				{
					//System.out.print(cell.getNumericCellValue()+" ");
					txt_output.append(cell.getNumericCellValue()+",\t");
				}
				else
				{
					//U Can Handel Boolean, Formula, Errors
				}
			}
			System.out.println();
			txt_output.append("\n");
		}
	
	}
	public void btnAction()
	{
		btn_submit.addActionListener(new ActionListener()
		{
			public void actionPerformed(ActionEvent arg0) 
			{
				if (!txt_search.getText().isEmpty())
				{
					txt_output.setText(null);
					try {
						readXLSFile();
					}
					catch (Exception e){
						JOptionPane.showMessageDialog(null, e);
						e.printStackTrace();
					}
					
				} 
				else 
				{
					JOptionPane.showMessageDialog(null,"Please Input Search Path");
				}
			}
		});
		btn_upload.addActionListener(new ActionListener()
		{
			public void actionPerformed(ActionEvent arg0) 
			{
				chooser.setDialogType(JFileChooser.OPEN_DIALOG);
				if (chooser.showDialog(panel_center, "Upload") != JFileChooser.APPROVE_OPTION)
				{
					return;
				}
				txt_search.setText(chooser.getSelectedFile().getPath());
			}
		});
	}

	public void cmp() 
	{
		add(panel_main);
		panel_main.setBorder(BorderFactory.createRaisedBevelBorder());
		panel_main.setLayout(new BorderLayout());
		panel_main.add(panel_center, BorderLayout.CENTER);
		panel_main.add(panel_north, BorderLayout.NORTH);
		panel_main.add(panel_south, BorderLayout.SOUTH);
		panel_north_work();
		panel_center_work();
		panel_south_work();
	}

	private void panel_north_work()
	{
		panel_north.setLayout(new BorderLayout());
		panel_north.add(panel_north_n, BorderLayout.NORTH);
		panel_north.add(panel_north_c, BorderLayout.CENTER);
		panel_north_n_work();
		panel_north_c_work();
	}

	public void panel_north_n_work()
	{
		panel_north_n.setBorder(BorderFactory.createTitledBorder(""));
		panel_north_n.setLayout(new FlowLayout());
		panel_north_n.add(new JLabel("Test Data"));
	}

	public void panel_north_c_work()
	{
		panel_north_c.setBorder(BorderFactory.createRaisedBevelBorder());
		panel_north_c.setLayout(new FlowLayout());
		panel_north_c.add(new JLabel("Path: "));
		panel_north_c.add(txt_search);
		panel_north_c.add(btn_upload);
		panel_north_c.add(btn_submit);
		txt_search.setPreferredSize(new Dimension(62,40));
		btn_upload.setPreferredSize(new Dimension(92,50));
		btn_submit.setPreferredSize(new Dimension(92,50));
		txt_search.setEditable(false);
	}

	private void panel_center_work() 
	{
		panel_center.setLayout(new FlowLayout());
		panel_center.setBorder(BorderFactory.createLoweredBevelBorder());
		panel_center.add(scroll_out);
		scroll_out.setBorder(BorderFactory.createTitledBorder(""));
	}

	private void panel_south_work()
	{
		//panel_south.add(new JLabel("Developed By: Mohammad Didarul Alam"));
	}
}