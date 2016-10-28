package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.testng.annotations.*;
import static org.testng.Assert.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class ManagementAreaFunction {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @BeforeClass(alwaysRun = true)
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "http://pinelands-music.tk/music_school/home.php";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testManagementAreaFunction() throws Exception {
    driver.get(baseUrl + "/music_school/manager/main.php");
    driver.findElement(By.name("selectBox")).click();
    driver.findElement(By.name("editRecord")).click();
    driver.findElement(By.name("updateRecord")).click();
    driver.findElement(By.linkText("Back to Manager Page")).click();
    driver.findElement(By.xpath("(//input[@name='selectBox'])[8]")).click();
    driver.findElement(By.xpath("(//input[@name='editRecord'])[2]")).click();
    driver.findElement(By.name("DOB")).clear();
    driver.findElement(By.name("DOB")).sendKeys("15/05/1999");
    driver.findElement(By.name("updateRecord")).click();
    driver.findElement(By.linkText("Back to Manager Page")).click();
    driver.findElement(By.xpath("(//input[@name='selectBox'])[27]")).click();
    driver.findElement(By.xpath("(//input[@name='deleteRecord'])[9]")).click();
    driver.findElement(By.linkText("Back to Manager Page")).click();
  }

  @AfterClass(alwaysRun = true)
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
